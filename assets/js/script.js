// var keyword = document.getElementById("keyword");
// var tombolCari = document.getElementById("tombol-cari");
// var container = document.getElementById("container");

// // tambahkan even ketika keyeword ditulis
// keyword.addEventListener("keyup", function () {
// 	var xhr = new XMLHttpRequest();
// 	// cek kesiapan ajax
// 	xhr.onreadystatechange = function () {
// 		if (xhr.readyState == 4 && xhr.status == 200) {
// 			container.innerHTML = xhr.responseText;
// 		}
// 	};
// 	// eksekusi ajax
// 	xhr.open("POST", "ajax/pasien.php?keyword=" + keyword.value, true);

// 	xhr.send();
// });
