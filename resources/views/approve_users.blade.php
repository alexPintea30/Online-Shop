
@if(auth()->check() && auth()->user()->isAdmin == 1)
    <!-- Select all unapproved users to be shown in the page -->
    <?php
    $allUnapprovedUsersJSON = DB::table('users')->where('isApproved', '0')->where('isAdmin', '0')->get();
    $allUnapprovedUsers = json_decode($allUnapprovedUsersJSON, true);
    ?>



    <html>
    <head>
        <title>Approve Users</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <!-- Home Page Hyperlink -->
        <a style="text-align:center ;font-size: 20px"; href="/">Home Page</a>
    </head>
    <body>

    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h1 align="center">Unapproved Users</h1><br />
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Is Approved</th>
                    <th>PersonID</th>
                    <th>Approve</th>
                </tr>
                <?php

                foreach ($allUnapprovedUsers as $entry)
                {
                    echo '<tr>
						 <td>'.$entry["id"].'</td>
                         <td>'.$entry["email"].'</td>
                         <td>'.$entry["isApproved"].'</td>
                         <td>'.$entry["personID"].'</td>
                         <td>   <form action="/approve" method="GET">
                                <input type="submit" name="approve_user_button_'.$entry["id"].'"  class="btn btn-success" value="Approve" />
                                <input type="hidden" name="hidden_id" value="'.$entry["id"].'" />
                                <input type="hidden" name="hidden_email" value='.$entry["email"].' />
                                </form>
                         </td>
                      </tr>';
                }
                ?>
            </table>
            <br />
        </div>
    </div>
    </body>
    </html>

@else
    <h1 style="text-align:center; font-size: 50px" >G0 Aw4y w0lly h4ck3r!</h1>
    <br>
    Or, if you're not a hacker...
    <a style="text-align:center ;font-size: 20px" href="/">Home Page</a>
@endif






