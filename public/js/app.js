function toggleSelect(transactionId) {
    var systemSelect = document.getElementById('system-select-' + transactionId);
    var customSelect = document.getElementById('custom-select-' + transactionId);
    var systemRadio = document.getElementById('system-' + transactionId);
    var customRadio = document.getElementById('custom-' + transactionId);

    if (systemRadio.checked) {
        systemSelect.style.display = 'block';
        customSelect.style.display = 'none';
    } else if (customRadio.checked) {
        systemSelect.style.display = 'none';
        customSelect.style.display = 'block';
    }
}

function clearCategories(transactionId) {
    var systemRadio = document.getElementById('system-' + transactionId);
    var customRadio = document.getElementById('custom-' + transactionId);
    var systemSelect = document.querySelector('#system-select-' + transactionId + '[data-system-category]');
    var customSelect = document.querySelector('#custom-select-' + transactionId + '[data-custom-category]');

    if (systemRadio.checked) {
        customSelect.value = '';
    } else if (customRadio.checked) {
        systemSelect.value = '';
    }
}

function clearFilterCategories() {
    var systemRadio = document.getElementById('system-filter');
    var customRadio = document.getElementById('custom-filter');
    var systemSelect = document.querySelector('#system-select-filter[data-system-category]');
    var customSelect = document.querySelector('#custom-select-filter[data-custom-category]');

    if (systemRadio.checked) {
        customSelect.value = '';
    } else if (customRadio.checked) {
        systemSelect.value = '';
    }
}

// Инициализация видимости при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    var modals = document.querySelectorAll('[id^="crud-modal-master-"]');
    modals.forEach(function(modal) {
        var transactionId = modal.id.split('-').pop();
        toggleSelect(transactionId);
    });

    // Инициализация для модалки добавления
    toggleSelect('add');

    // Инициализация для модалки фильтрации
    toggleSelect('filter');
});