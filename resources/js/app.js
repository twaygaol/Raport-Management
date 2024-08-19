function initCharts(dataSiswaCount, dataGuruCount, dataWaliKelasCount) {
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // or 'line', 'pie', etc.
        data: {
            labels: ['Siswa', 'Guru', 'Wali Kelas'],
            datasets: [{
                label: 'Jumlah',
                data: [dataSiswaCount, dataGuruCount, dataWaliKelasCount],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw;
                        }
                    }
                }
            }
        }
    });
}

// Ensure charts are initialized on page load
document.addEventListener('DOMContentLoaded', function() {
    const dataSiswaCount = document.getElementById('myChart').dataset.siswaCount;
    const dataGuruCount = document.getElementById('myChart').dataset.guruCount;
    const dataWaliKelasCount = document.getElementById('myChart').dataset.waliKelasCount;
    initCharts(dataSiswaCount, dataGuruCount, dataWaliKelasCount);
});
