<?php
/*
Template Name: Jadwal Ibadah
*/
get_header(); ?>

<div class="container py-5">
    <h1 class="mb-4">Jadwal Ibadah Mingguan</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Jenis Ibadah</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Minggu</td>
                <td>07.00</td>
                <td>Ibadah Pagi</td>
                <td>Gereja Utama</td>
            </tr>
            <tr>
                <td>Minggu</td>
                <td>17.00</td>
                <td>Ibadah Sore</td>
                <td>Gereja Utama</td>
            </tr>
            <tr>
                <td>Rabu</td>
                <td>19.00</td>
                <td>Doa Tengah Minggu</td>
                <td>Gedung Serbaguna</td>
            </tr>
        </tbody>
    </table>
</div>

<?php get_footer(); ?>