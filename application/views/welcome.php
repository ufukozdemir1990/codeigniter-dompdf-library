<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Codeigniter Dompdf Library</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    </head>
    <body>
        <div class="container mb-5">
            <div class="jumbotron mt-4">
                <div class="container">
                    <h1>Codeigniter Dompdf Library</h1>
                    <p>Bu içerik <strong>Ufuk Özdemir</strong> tarafından hazırlanmıştır</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card text-center mb-3">
                        <div class="card-header h6">Portrait View</div>
                        <div class="card-body">
                            <div class="py-4 mb-3 mx-auto rounded border bg-light">
                                <i class="fas fa-arrows-alt-v fa-2x"></i>
                            </div>
                            <dl class="m-0">
                                <dd><?php echo anchor('create-view/a4/', 'A4 Portrait', array('target'=>'_blank')); ?></dd>
                                <dd class="m-0"><?php echo anchor('create-view/a5/', 'A5 Portrait', array('target'=>'_blank')); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center mb-3">
                        <div class="card-header h6">Landscape View</div>
                        <div class="card-body">
                            <div class="py-4 mb-3 mx-auto rounded border bg-light">
                                <i class="fas fa-arrows-alt-h fa-2x"></i>
                            </div>
                            <dl class="m-0">
                                <dd><?php echo anchor('create-view/a4/landscape/', 'A4 Landscape', array('target'=>'_blank')); ?></dd>
                                <dd class="m-0"><?php echo anchor('create-view/a5/landscape/', 'A5 Landscape', array('target'=>'_blank')); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center mb-3">
                        <div class="card-header h6">Portrait Download</div>
                        <div class="card-body">
                            <div class="py-4 mb-3 mx-auto rounded border bg-light">
                                <i class="fas fa-arrows-alt-v fa-2x"></i>
                            </div>
                            <dl class="m-0">
                                <dd><?php echo anchor('create-download/a4/', 'A4 Portrait'); ?></dd>
                                <dd class="m-0"><?php echo anchor('create-download/a5/', 'A5 Portrait'); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center mb-3">
                        <div class="card-header h6">Landscape Download</div>
                        <div class="card-body">
                            <div class="py-4 mb-3 mx-auto rounded border bg-light">
                                <i class="fas fa-arrows-alt-h fa-2x"></i>
                            </div>
                            <dl class="m-0">
                                <dd><?php echo anchor('create-download/a4/landscape/', 'A4 Landscape'); ?></dd>
                                <dd class="m-0"><?php echo anchor('create-download/a5/landscape/', 'A5 Landscape'); ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>