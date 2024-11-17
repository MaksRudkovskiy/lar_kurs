// Функция для создания графика количества постов по месяцам
function createPostsChart(postsData) {
    const postsChart = new Chart(document.getElementById('postsChart'), {
        type: 'line',
        data: {
            labels: postsData.labels,
            datasets: [{
                label: 'Количество постов',
                data: postsData.data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Функция для создания графика количества комментариев по месяцам
function createCommentsChart(commentsData) {
    const commentsChart = new Chart(document.getElementById('commentsChart'), {
        type: 'bar',
        data: {
            labels: commentsData.labels,
            datasets: [{
                label: 'Количество комментариев',
                data: commentsData.data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Функция для создания графика количества просмотров страниц
function createPageViewsChart(analyticsData) {
    const pageViewsChart = new Chart(document.getElementById('pageViewsChart'), {
        type: 'bar',
        data: {
            labels: ['Просмотры страниц'],
            datasets: [{
                label: 'Количество просмотров',
                data: [analyticsData.pageViews],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Функция для создания графика количества кликов по ссылкам
function createLinkClicksChart(analyticsData) {
    const linkClicksChart = new Chart(document.getElementById('linkClicksChart'), {
        type: 'bar',
        data: {
            labels: ['Клик по ссылкам'],
            datasets: [{
                label: 'Количество кликов',
                data: [analyticsData.linkClicks],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Функция для создания графика количества времени на сайте
function createTimeOnSiteChart(analyticsData) {
    const timeOnSiteChart = new Chart(document.getElementById('timeOnSiteChart'), {
        type: 'bar',
        data: {
            labels: ['Время на сайте'],
            datasets: [{
                label: 'Количество записей',
                data: [analyticsData.timeOnSite],
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Функция для инициализации графиков
function initializeCharts(postsData, commentsData, analyticsData) {
    createPostsChart(postsData);
    createCommentsChart(commentsData);
    createPageViewsChart(analyticsData);
    createLinkClicksChart(analyticsData);
    createTimeOnSiteChart(analyticsData);
}

// Экспортируем функцию для использования в Blade-шаблоне
export { initializeCharts };