<?php

require_once("../../functions/helpers.php");
require_once("../../functions/pdo_connection.php");
require_once ('../../functions/check_session.php');
  if (isset($_POST["name"]) && !empty($_POST["name"])) {
      global $pdo;
      $sql='INSERT INTO php_project.categorizes (name_cat,created_at) VALUES (:name ,NOW())';
      $stmt=$pdo->prepare($sql);
      $stmt->bindParam(':name',$_POST["name"]);
      $stmt->execute();
      redirect('panel/category');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" type="text/css">
</head>

<body>
<section id="app">

    <?php $this->include("panel.layouts.top-nav") ?>

    <section class="container-fluid">
        <section class="row">
            <section class="col-md-2 p-0">
                <?php $this->include("panel.layouts.sidebar")?>
            </section>
            <section class="col-md-10 pt-3">

                <form action="<?= url('panel/category/create.php')  ?>" method="post">
                    <section class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name ...">
                    </section>
                    <section class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </section>

                </form>

            </section>
        </section>
    </section>

<?php $this->include("panel.layouts.footer")?>