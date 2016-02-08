<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Zoo - Cafeteria</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Cafeteria</h1>
            </div>
            <br>
            <br>
            <div class="row" id="btnBar">
                <button id="btn_branch" class="btn btn-default" onclick="return fetchDB('Branch');">Branch</button>
                <button id="btn_rest" class="btn btn-default" onclick="return fetchDB('Restaurant');">Restaurant</button>
                <button id="btn_menu" class="btn btn-default" onclick="return fetchDB('Menu');">Menu</button>
            </div>
            <br>
            <br>

            <section id="Branch" hidden>
                <button class="btn btn-default" id="addBranch"> + Add New Branch</button>
                <form class="form-horizontal" method="get">
                  <div class="control-group" id="store" hidden>
                    <div class="row">
                      <label class="control-label col-md-3" for="title">Branch No.: </label>
                      <div class="controls col-md-7">
                        <input class="form-control" type="text" name="title" id="title" style="padding: 1px;">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="startDate">Open Time: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="startDate" id="startDate" type="text" style="padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Close Time: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Number of Shops: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Close Time: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                  </div>
                </form>
                <table id="tbl" cellspacing='0' style="width: inherit; margin-left: 25px;">
                    <?php include('showBranch.php');?>
                </table>
            </section>

            <section id="Restaurant" hidden>
                <button class="btn btn-default" id="addRest"> + Add New Restaurant</button>
                <form class="form-horizontal" method="get">
                  <div class="control-group" id="store" hidden>
                    <div class="row">
                      <label class="control-label col-md-3" for="title">Shop No.: </label>
                      <div class="controls col-md-7">
                        <input class="form-control" type="text" name="title" id="title" style="padding: 1px;">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="startDate">Shop Name: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="startDate" id="startDate" type="text" style="padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Type: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row" style="height: 30px;">
                        <label class="control-label col-md-3 checkbox" for="allDay">Staff ID: </label>
                        <input class="form-control" name="allDay" id="allDay" style="margin-right: 5px; padding: 1px;">
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                  </div>
                </form>
                <table id="tbl" cellspacing='0' style="width: inherit; margin-left: 25px;">
                    <?php include('showRestaurant.php');?>
                </table>
            </section>

            <section id="Menu" hidden>
                <button class="btn btn-default" id="addMenu"> + Add New Menu</button>
                <form class="form-horizontal" method="post">
                  <div class="control-group" id="store" hidden>
                    <div class="row">
                      <label class="control-label col-md-3" for="title">Menu No.: </label>
                      <div class="controls col-md-7">
                        <input class="form-control" type="text" name="title" id="title" style="padding: 1px;">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="startDate">Menu Name: </label>: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="startDate" id="startDate" type="text" style="padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Category: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <br>
                    <div class="row" style="height: 30px;">
                        <label class="control-label col-md-3 checkbox" for="allDay">Price: </label>
                        <input class="form-control" name="allDay" id="allDay" style="margin-right: 5px; padding: 1px;">
                    </div>
                    <br>
                    <div class="row">
                        <label class="control-label col-md-3" for="endDate">Shop ID.: </label>
                        <div class="controls input-append col-md-7">
                            <input class="form-control" name="endDate" id="endDate" style="margin-right: 5px; padding: 1px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                  </div>
                </form>
                <table id="tbl" cellspacing='0' style="width: inherit; margin-left: 25px;">
                    <?php include('showMenu.php');?>
                </table>
                
            </section>
            </div>

            <script>
                var main = ['Branch', 'Restaurant', 'Menu'];
                function fetchDB(name) {
                    console.log(name);
                    for (var i = 0; i < 4; i++) {
                        if ($('#' + main[i]).is(':visible') && main[i] != name) {
                            $('#' + main[i]).hide();
                        } else {
                            $('#' + name).show();
                        }
                    }
                    return false;
                }

                $('#addBranch').on('click', function (e) {
                    $('#store').show();
                })

                function delBranch(id) {
                    console.log(id);
                    $.ajax({
                        url: '/delBranch.php',
                        id: id,
                        type: 'POST'
                    });
                    return true;
                }


            </script>      
    </body>
</html>