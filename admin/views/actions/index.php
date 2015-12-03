<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 02.12.2015
 * Time: 21:54
 */?>

<section class="content-header">
    <h1>Акции</h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="return false;" class="current"><i class="fa fa-book"></i>Акции</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="actions" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Начало</th>
                                <th>Конец</th>
                                <th>Бесконечная</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->actions as $action): ?>
                                <tr>
                                    <td><?=$action['name']?></td>
                                    <td><?=$action['start_at']?></td>
                                    <td><?=$action['end_at']?></td>
                                    <td><?=$action['forever'] == '1' ? 'Да' : 'Нет'?></td>
                                    <td>
                                        <input type="hidden" name="action-id" value="<?=$action['id']?>">
                                        <?php if($action['visible'] == 0):?>
                                            <button class="btn btn-success btn-flat btn-sm change-visible"><i class="fa fa-play"></i></button>
                                        <?php else:?>
                                            <button class="btn btn-warning btn-flat btn-sm change-visible"><i class="fa fa-pause"></i></button>
                                        <?php endif;?>
                                        <button class="btn btn-danger btn-flat btn-sm remove"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<script type="text/javascript">
    var homePath = "<?=\core\Routing::getPath('actions')?>";
    var playPausePath = "<?=\core\Routing::getPath('actions_change_visibility')?>";
    var removePath = "<?=\core\Routing::getPath('actions_remove')?>";
</script>
<script src="/admin/assets/js/actions/index/main.js" type="text/javascript"></script>
