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
            <a href="<?=site_url("boat/index")?>">
                <button	ton class="btn btn-primary">Kembali</button>
            </a>
        </div>
        <div class="row mt-2">
            <div class="card col-6">
                <div class="card-header">
                    <h4>Master Boat</h4>
                </div>
                <div class="card-body">
                    <form action="<?= site_url("boat/update/") ?><?=$data['id']?>" method="post">
                        <div class="row">
                            <label for="boat_name">Boat Name</label>
                            <input type="text" name="boat_name" id="boat_name"
                                placeholder="Boat Axxxx"
                                class="form-control"
                                value="<?= $data['boat_name'] ?>"
                                required
                                >
                        </div>
                        <div class="row mt-2">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude"
                                placeholder="113.12xxxxx"
                                class="form-control"
                                value="<?= $data['latitude'] ?>"
                                required
                                >
                        </div>
                        <div class="row mt-2">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude"
                                placeholder="-71230xxxx"
                                class="form-control"
                                value="<?= $data['longitude'] ?>"
                                required
                                >
                        </div>
                        <div class="row mt-2">
                            <label for="rotation">Rotation</label>
                            <input type="text" name="rotation" id="rotation"
                                placeholder="90"
                                class="form-control"
                                value="<?= $data['rotation'] ?>"
                                required
                                >
                        </div>
                        <div class="row mt-2">
                            <button type="submit" class="mt-2 btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url() ?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/core/bootstrap.min.js"></script>
</html>