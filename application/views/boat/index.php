<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boat</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <a href="<?=site_url("welcome/index")?>">
                <button	ton class="btn btn-primary">Dashboard</button>
            </a>
            &nbsp;
            <a href="<?=site_url("boat/create")?>">
                <button	ton class="btn btn-primary">Tambah Boat</button>
            </a>
        </div>
        <div class="row mt-2">
            <div class="card">
                <div class="card-header">
                    <h4>Master Boat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Boat Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Rotation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data as $item) : ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?= ucfirst($item['boat_name']) ?></td>
                                    <td><?=$item['latitude']?></td>
                                    <td><?=$item['longitude']?></td>
                                    <td><?=$item['rotation']?></td>
                                    <td>
                                        <a href="<?=base_url('boat/edit/')?><?=$item['id']?>" class="btn btn-warning">Edit</a>
                                        <a href="<?=base_url('boat/delete/')?><?=$item['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url() ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
</html>