<?php /* Template Name: Jadwal Ibadah */ ?>
<?php get_header(); ?>

<section class="container py-5">
    <h1 class="mb-4 text-center">Jadwal Ibadah</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>Hari</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Minggu</td>
                    <td>07.00 WIB</td>
                    <td>Gereja Induk</td>
                    <td>Ibadah Umum</td>
                </tr>
                <tr>
                    <td>Rabu</td>
                    <td>18.30 WIB</td>
                    <td>Aula Gereja</td>
                    <td>Ibadah Doa</td>
                </tr>
                <tr>
                    <td>Sabtu</td>
                    <td>16.00 WIB</td>
                    <td>Gereja Anak</td>
                    <td>Ibadah Pemuda</td>
                </tr>
                <!-- Tambahkan baris sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
</section>

<?php get_footer(); ?>