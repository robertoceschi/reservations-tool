<script type="text/javascript">
    $(document).ready(function () {
        //$("#success").hide();
        //$("#error").hide();
        //status ändern inaktiv->aktiv->inaktiv
        $('.toggleStatus ').click(function () {
            //deaktivieren
            if ($(this).hasClass('inaktiv')) {
                reference = $(this);
                //var user_id = $(this).attr('id');
                var user_name = $(this).attr('title');
                var r = confirm('Sie wollen' + user_name + 'deaktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
                    $.ajax({
                        url:WEBROOT + "ajax/deactivate/" + I,
                        type:"post",
                        data:'id=' + I,
                        dataType:'json',
                        success:function (json) {
                            if (json.status == "success") {
                                //reference.toggleClass('aktiv');
                                reference.removeClass('inaktiv');
                                reference.addClass('aktiv');
                                reference.empty();
                                reference.append('Inaktiv');
                                $("#successMessage").html(json.message);
                                $(".alert-success").show();
                                //$('.close').click(function() {
                                //alert('klasse aktiv');


                                //});
                            }

                            else {
                                $("#errorMessage").html(json.message);
                                $(".alert-error").show();
                            }
                        }
                    });
                }
            } else {
                //aktivieren
                reference = $(this);
                var user_id = $(this).attr('id');
                var user_name = $(this).attr('title');
                var r = confirm('Sie wollen' + user_name + 'aktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
                    $.ajax({
                        url:WEBROOT + "ajax/activate/" + I,
                        type:"post",
                        data:'id=' + I,
                        dataType:'json',
                        success:function (json) {
                            if (json.status == "success") {
                                //reference.toggleClass('aktiv');
                                reference.removeClass('aktiv');
                                reference.addClass('inaktiv');
                                reference.empty();
                                reference.append('Aktiv');
                                $("#successMessage").html(json.message);
                                $(".alert-success").show();
                                //$('.close').click(function() {
                                //alert('klasse inaktiv');

                                //});

                            }
                            else {
                                $("#errorMessage").html(json.message);
                                $(".alert-error").show();
                            }
                        }
                    });
                }
            }
        });
        //error Message wird mit click() geschlossen!!
        $('.close').click(function () {
            $('.alert').hide();
        })


        //delete User
        $('.delete_user').click(function () {
            reference = $(this);
            //var user_id = $(this).attr('id');
            var user_name = $(this).attr('title');
            var r = confirm('Sie wollen ' + user_name + '');
            if (r == true) {
                var element = $(this);
                var I = element.attr("id");
                $.ajax({
                    url:WEBROOT + "ajax/delete_user/" + I,
                    type:"post",
                    data:'id=' + I,
                    dataType:'json',
                    success:function (json) {
                        if (json.status == "success") {
                            reference.parent().parent().parent().remove();
                            $("#successMessage").html(json.message);
                            $(".alert-success").show();
                        }
                        else {
                            $("#errorMessage").html(json.message);
                            $(".alert-error").show();
                        }
                    }
                });
            }

        });
    });
</script>

<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="alert alert-success" style="display: none">
    <button class="close">×</button>
    <strong>
        <div id="successMessage"></div>
    </strong>
</div>
<div class="alert alert-error" style="display: none">
    <button class="close"
    <!--data-dismiss="alert"-->>×</button>
    <strong>
        <div id="errorMessage"></div>
    </strong>
</div>


<div id=new_user>
    <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>"> <i
            class=" icon-plus icon-white"></i> Neues Mitglied eintragen</a></button>
</div>
    <?php echo $this->pagination->create_links(); ?>
</div>
</div>
</div>





<table class="table table-bordered data-table">
									<thead>
									<tr>
									<th>Rendering engine</th>
									<th>Browser</th>
									<th>Platform(s)</th>
									<th>Engine version</th>
									</tr>
									</thead>
									<tbody>
									<tr class="gradeX">
									<td>Trident</td>
									<td>Internet
									Explorer 4.0</td>
									<td>Win 95+</td>
									<td class="center">4</td>
									</tr>
									<tr class="gradeC">
									<td>Trident</td>
									<td>Internet
									Explorer 5.0</td>
									<td>Win 95+</td>
									<td class="center">5</td>
									</tr>
									<tr class="gradeA">
									<td>Trident</td>
									<td>Internet
									Explorer 5.5</td>
									<td>Win 95+</td>
									<td class="center">5.5</td>
									</tr>
									<tr class="gradeA">
									<td>Trident</td>
									<td>Internet
									Explorer 6</td>
									<td>Win 98+</td>
									<td class="center">6</td>
									</tr>
									<tr class="gradeA">
									<td>Trident</td>
									<td>Internet Explorer 7</td>
									<td>Win XP SP2+</td>
									<td class="center">7</td>
									</tr>
									<tr class="gradeA">
									<td>Trident</td>
									<td>AOL browser (AOL desktop)</td>
									<td>Win XP</td>
									<td class="center">6</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.7</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 1.5</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 2.0</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Firefox 3.0</td>
									<td>Win 2k+ / OSX.3+</td>
									<td class="center">1.9</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.0</td>
									<td>OSX.2+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Camino 1.5</td>
									<td>OSX.3+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape 7.2</td>
									<td>Win 95+ / Mac OS 8.6-9.2</td>
									<td class="center">1.7</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Browser 8</td>
									<td>Win 98SE+</td>
									<td class="center">1.7</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Netscape Navigator 9</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.1</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.1</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.2</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.2</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.3</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.3</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.4</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.4</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.5</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.5</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.6</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">1.6</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.7</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.7</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Mozilla 1.8</td>
									<td>Win 98+ / OSX.1+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Seamonkey 1.1</td>
									<td>Win 98+ / OSX.2+</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Gecko</td>
									<td>Epiphany 2.20</td>
									<td>Gnome</td>
									<td class="center">1.8</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.2</td>
									<td>OSX.3</td>
									<td class="center">125.5</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 1.3</td>
									<td>OSX.3</td>
									<td class="center">312.8</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 2.0</td>
									<td>OSX.4+</td>
									<td class="center">419.3</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>Safari 3.0</td>
									<td>OSX.4+</td>
									<td class="center">522.1</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>OmniWeb 5.5</td>
									<td>OSX.4+</td>
									<td class="center">420</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>iPod Touch / iPhone</td>
									<td>iPod</td>
									<td class="center">420.1</td>
									</tr>
									<tr class="gradeA">
									<td>Webkit</td>
									<td>S60</td>
									<td>S60</td>
									<td class="center">413</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.0</td>
									<td>Win 95+ / OSX.1+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 7.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.0</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 8.5</td>
									<td>Win 95+ / OSX.2+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.0</td>
									<td>Win 95+ / OSX.3+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.2</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera 9.5</td>
									<td>Win 88+ / OSX.3+</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Opera for Wii</td>
									<td>Wii</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Nokia N800</td>
									<td>N800</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Presto</td>
									<td>Nintendo DS browser</td>
									<td>Nintendo DS</td>
									<td class="center">8.5</td>
									</tr>
									<tr class="gradeC">
									<td>KHTML</td>
									<td>Konqureror 3.1</td>
									<td>KDE 3.1</td>
									<td class="center">3.1</td>
									</tr>
									<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.3</td>
									<td>KDE 3.3</td>
									<td class="center">3.3</td>
									</tr>
									<tr class="gradeA">
									<td>KHTML</td>
									<td>Konqureror 3.5</td>
									<td>KDE 3.5</td>
									<td class="center">3.5</td>
									</tr>
									<tr class="gradeX">
									<td>Tasman</td>
									<td>Internet Explorer 4.5</td>
									<td>Mac OS 8-9</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.1</td>
									<td>Mac OS 7.6-9</td>
									<td class="center">1</td>
									</tr>
									<tr class="gradeC">
									<td>Tasman</td>
									<td>Internet Explorer 5.2</td>
									<td>Mac OS 8-X</td>
									<td class="center">1</td>
									</tr>
									<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.1</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeA">
									<td>Misc</td>
									<td>NetFront 3.4</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeX">
									<td>Misc</td>
									<td>Dillo 0.8</td>
									<td>Embedded devices</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeX">
									<td>Misc</td>
									<td>Links</td>
									<td>Text only</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeX">
									<td>Misc</td>
									<td>Lynx</td>
									<td>Text only</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeC">
									<td>Misc</td>
									<td>IE Mobile</td>
									<td>Windows Mobile 6</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeC">
									<td>Misc</td>
									<td>PSP browser</td>
									<td>PSP</td>
									<td class="center">-</td>
									</tr>
									<tr class="gradeU">
									<td>Other browsers</td>
									<td>All others</td>
									<td>-</td>
									<td class="center">-</td>
									</tr>
									</tbody>
									</table>