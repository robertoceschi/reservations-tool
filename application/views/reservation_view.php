<style type="text/css">
    .calendar {
        font-family: Arial;
        font-size: 12px;
    }

    table.calendar {
        margin: auto;
        border-collapse: collapse;
    }

    .calendar .days td {
        width: 80px;
        height: 80px;
        padding: 4px;
        border: 1px solid #999;
        vertical-align: top;
        background-color: #DEF;
    }

    .calendar .days td:hover {
        background-color: #FFF;
    }

    .calendar .highlight {
        font-weight: bold;
        color: #00F;
    }
</style>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
                </div>
                <div class="widget-content nopadding">
                     <?php
                    $attributes = array('class' => '', 'id' => '');
                    echo form_open('email/send', $attributes);
                    foreach ($court as $key => $value) {
                    $court[$key] = $value;
                    }
                    echo form_dropdown('courts', $court);
                    ?>
                    <!--Version mit "normalen HTML"
                    <select name="court_name">
                    <?php
                    foreach ($court as $key => $value) {
                        ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php
                    }
                    ?></select>-->



                    <?php
                    echo $calendar;    ?>
                        <script type="text/javascript">
                        $(document).ready(function () {
                            $('.calendar .day').click(function () {
                                day_num = $(this).find('.day_num').html();
                                day_data = prompt('Enter Stuff', $(this).find('.content').html());
                                if (day_data != null) {

                                    $.ajax({
                                        url:window.location,
                                        type:'POST',
                                        data:{
                                            day:day_num,
                                            data:day_data
                                        },
                                        success:function (msg) {
                                            location.reload();
                                        }
                                    });

                                }

                            });

                        });

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>



