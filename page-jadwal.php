<?php /* Template Name: Jadwal Ibadah */ ?>
<?php get_header(); ?>

<?php
$hero = get_theme_mod('jadwal_hero_image');
$alamat = get_theme_mod('jadwal_alamat');
$jadwal_json = get_theme_mod('jadwal_ibadah');
$jadwal = json_decode($jadwal_json, true);
?>

<!-- Hero Section -->
<?php if ($hero): ?>
    <section class="text-white text-center py-5" style="background: url('<?php echo esc_url($hero); ?>') center/cover no-repeat;">
        <div class="bg-dark bg-opacity-50 py-5">
            <h1 class="display-5 fw-bold">Jadwal Ibadah</h1>
            <p class="lead"><?php echo esc_html($alamat); ?></p>
        </div>
    </section>
<?php endif; ?>
<section class="container py-5">
    <div class="table-responsive shadow-sm rounded-3 overflow-hidden">
        <table class="table table-striped table-bordered align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-uppercase small">Hari</th>
                    <th scope="col" class="text-uppercase small">Waktu</th>
                    <th scope="col" class="text-uppercase small">Tempat</th>
                    <th scope="col" class="text-uppercase small">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal)) :
                    foreach ($jadwal as $row) : ?>
                        <tr>
                            <td><?php echo esc_html($row['hari']); ?></td>
                            <td><?php echo esc_html($row['waktu']); ?></td>
                            <td><?php echo esc_html($row['tempat']); ?></td>
                            <td><?php echo esc_html($row['keterangan']); ?></td>
                        </tr>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="4">Belum ada jadwal ditambahkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php get_footer(); ?>