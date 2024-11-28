const ctx = document.getElementById("DiagramPie");

new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: [
      "Kategori Sains",
      "Kategori Seni",
      "Kategori Olahraga",
      "Lain-lain",
    ],
    datasets: [
      {
        data: [12, 10, 12, 8], // Data untuk setiap kategori
        borderWidth: 1,
        backgroundColor: [
          "#C6E0F7", // Warna untuk Kategori Sains
          "#70B1EA", // Warna untuk Kategori Seni
          "#3063C5", // Warna untuk Kategori Olahraga
          "#1D2C4E", // Warna untuk Lain-lain
        ],
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});



const ctx1 = document.getElementById("DiagramBatangPerTahun");

new Chart(ctx1, {
  type: "bar",
  data: {
    labels: ["2020", "2021", "2022", "2023", "2024"],
    datasets: [
      {
        label: "Kategori Sains",
        data: [12, 19, 10, 16, 17],
        borderWidth: 1,
        backgroundColor: "#C6E0F7",
      },
      {
        label: "Kategori Seni",
        data: [10, 18, 9, 14, 14],
        borderWidth: 1,
        backgroundColor: "#70B1EA",
      },
      {
        label: "Kategori Olahraga",
        data: [12, 20, 7, 7, 10],
        borderWidth: 1,
        backgroundColor: "#3063C5",
      },
      {
        label: "Lain-lain",
        data: [8, 14, 3, 5, 8],
        borderWidth: 1,
        backgroundColor: "#1D2C4E",
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});



const ctx2 = document.getElementById("DiagramBatang1Tahun");

new Chart(ctx2, {
  type: "bar",
  data: {
    labels: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
    datasets: [
      {
        label: "Kategori Sains",
        data: [12, 19, 10, 16, 17, 15, 20, 13, 18, 16, 14, 17],
        borderWidth: 1,
        backgroundColor: "#C6E0F7",
      },
      {
        label: "Kategori Seni",
        data: [10, 18, 9, 14, 14, 11, 18, 12, 15, 13, 12, 16],
        borderWidth: 1,
        backgroundColor: "#70B1EA",
      },
      {
        label: "Kategori Olahraga",
        data: [12, 20, 7, 7, 10, 8, 14, 10, 12, 11, 9, 13],
        borderWidth: 1,
        backgroundColor: "#3063C5",
      },
      {
        label: "Lain-lain",
        data: [8, 14, 3, 5, 8, 6, 10, 7, 9, 6, 8, 12],
        borderWidth: 1,
        backgroundColor: "#1D2C4E",
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});

