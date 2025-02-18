<?php

function formatTanggal($tanggal)
{
    $bulan = [
        1  => 'Januari',
        2  => 'Februari',
        3  => 'Maret',
        4  => 'April',
        5  => 'Mei',
        6  => 'Juni',
        7  => 'Juli',
        8  => 'Agustus',
        9  => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $date = new \DateTime($tanggal);
    $day = $date->format('d');
    $month = (int)$date->format('m');
    $year = $date->format('Y');

    return $day . ' ' . $bulan[$month] . ' ' . $year;
}
