<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\CustomCategories;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Auth;


class ExportController extends Controller
{
    public function exportWord()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(function ($transaction) {
                return Carbon::parse($transaction->date)->format('Y-m');
            });

        $monthlyData = $transactions->map(function ($transactionsForMonth, $month) {
            $totalIncome = $transactionsForMonth->where('type_id', '2')->sum('amount');
            $totalExpense = $transactionsForMonth->where('type_id', '1')->sum('amount');
            return [
                'month' => Carbon::parse($month)->translatedFormat('F Y'),
                'totalIncome' => $totalIncome,
                'totalExpense' => $totalExpense,
            ];
        })->values();

        $icons = $this->getIcons();
        $customCategories = CustomCategories::where('user_id', $user->id)->get();

        // Создание нового документа Word
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Добавление заголовка
        $section->addText('Отчет по транзакциям', ['size' => 16, 'bold' => true]);

        // Добавление данных по месяцам
        foreach ($monthlyData as $monthData) {
            $section->addTextBreak();
            $section->addText($monthData['month'], ['size' => 14, 'bold' => true]);

            $section->addText('Общий расход: ' . $monthData['totalExpense']);

            // Преобразуем текстовый месяц в числовой формат
            $monthKey = $this->convertMonthToKey($monthData['month']);

            if (isset($transactions[$monthKey])) {
                foreach ($transactions[$monthKey] as $transaction) {
                    // Преобразуем ID категории в текстовое название
                    $categoryName = $this->getCategoryName($transaction->category_id);
                    $customCategoryName = $this->getCustomCategoryName($transaction->custom_category_id, $customCategories);
                    
                    $section->addText('                             ');

                    $section->addText('Категория: ' . ($customCategoryName ?: $categoryName));
                    $section->addText('Сумма: ' . $transaction->amount);
                    $section->addText('Дата: ' . $transaction->date);
                    $section->addTextBreak();
                }
            }
        }

        // Сохранение документа
        $filename = 'report_' . date('Y-m-d_H-i-s') . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filename);

        // Отправка файла пользователю
        return response()->download($filename)->deleteFileAfterSend(true);
    }

    private function getIcons()
    {
        return [
            1 => 'bus.svg',
            2 => 'cart.svg',
            3 => 'health.svg',
            4 => 'transaction.svg',
            5 => 'gamepad.svg',
            6 => 'entertainment.svg',
            7 => 'taxi.svg',
            8 => 'sport.svg',
            9 => 'beauty.svg',
            10 => 'fuel.svg',
            11 => 'house.svg',
            12 => 'other.svg',
        ];
    }

    private function convertMonthToKey($month)
    {
        $months = [
            'январь' => '01',
            'февраль' => '02',
            'март' => '03',
            'апрель' => '04',
            'май' => '05',
            'июнь' => '06',
            'июль' => '07',
            'август' => '08',
            'сентябрь' => '09',
            'октябрь' => '10',
            'ноябрь' => '11',
            'декабрь' => '12',
        ];

        // Разделяем месяц и год
        list($monthName, $year) = explode(' ', $month);

        // Преобразуем текстовый месяц в числовой формат
        $monthNumber = $months[mb_strtolower($monthName)];

        // Возвращаем ключ в формате "Y-m"
        return $year . '-' . $monthNumber;
    }

    private function getCategoryName($categoryId)
    {
        $categories = [
            1 => __('profile.transport'),
            2 => __('profile.groceries'),
            3 => __('profile.health'),
            4 => __('profile.transfer'),
            5 => __('profile.games'),
            6 => __('profile.entertainment'),
            7 => __('profile.taxi'),
            8 => __('profile.sport'),
            9 => __('profile.beauty'),
            10 => __('profile.fuel'),
            11 => __('profile.house'),
            12 => __('profile.other'),
        ];

        return $categories[$categoryId] ?? 'Без категории';
    }

    private function getCustomCategoryName($customCategoryId, $customCategories)
    {
        $customCategory = $customCategories->firstWhere('id', $customCategoryId);
        return $customCategory ? $customCategory->custom_category_name : null;
    }
}