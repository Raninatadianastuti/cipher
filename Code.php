<?php

$input = 'Kaharisman';
$key = 13; //caesar cipher

echo Enkripsi($input, $key);
echo Dekripsi(Enkripsi($input, $key), $key);


function Caesar_cipher($huruf, $key)
{
  // periksa inputan, harus alphabet
  $huruf = ctype_alpha($huruf)? $huruf : die('Inputan salah!');

  //ubah inputan kedalam uppercase
  $huruf = strtoupper($huruf);

  // periksa nomor ascii nya
  $ascii = ord($huruf);

  // tambahkan key nya / geser ke nomor ascii yang baru
  $ascii_baru = $ascii + $key;

  // periksa jika nomor ascii sudah sampai alphabet terakhir
  // kembalikan ke alphabet awal
  $ascii_baru = $ascii_baru > 90 ? $ascii_baru - 26 : $ascii_baru;
  $ascii_baru = $ascii_baru < 65 ? $ascii_baru + 26 : $ascii_baru;

  // tampilkan huruf baru yang sudah digeser
  $huruf_baru = chr($ascii_baru);
  return ($huruf_baru);

}

function Enkripsi($input, $key)
{
	$output = "";

  // pisahkan kalimat inputan menjadi huruf dalam array
	$inputArr = str_split($input);

  // looping inputan
	foreach ($inputArr as $huruf){
    // masukan hasil enkripsi kedalam variabel output
    $output .= Caesar_cipher($huruf, $key);
  }

  // kembalian
	return $output;
}

function Dekripsi($input, $key)
{
  // lakukan Enkripsi dengan inputan keynya menjadi negatif
	return Enkripsi($input, -1 * $key);
}

?>
