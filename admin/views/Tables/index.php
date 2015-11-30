<?php
/**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 20:43
 */ ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Заказанные столы</h1>
    <ol class="breadcrumb">
        <li><a href="#" onclick="return false;" class="current"><i class="fa fa-book"></i>Заказанные столы</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Фильтры</h3>
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <div class="input-group">
                                        <label for="date-from">Дата с</label>
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date-from" value="<?=$this->from->format('d.m.Y')?>">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-3">
                                    <div class="input-group">
                                        <label for="date-to">Дата по</label>
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="date-to" value="<?=isset($this->to) ? $this->to->format('d.m.Y') : ''?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Дата и время</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php /** @var \models\TableRequests $table */
                            if(sizeof($this->tables) !== 0):
                                foreach($this->tables as $table): ?>
                                    <tr>
                                        <td><?=$table->name?></td>
                                        <td><?=$table->phone?></td>
                                        <td><?=$table->email?></td>
                                        <td><?=$table->date?></td>
                                    </tr>
                                <?php endforeach;
                            else :?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">Не найдено забронированных столиков</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<script type="text/javascript">
    var homePath = "<?=\core\Routing::getPath('home');?>";
</script>
<script src="/admin/assets/js/tables/index/main.js" type="text/javascript"></script>