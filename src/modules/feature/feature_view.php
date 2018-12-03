<?php
/**
 * Created by PhpStorm.
 * User: Nick Sladic
 * Date: 11/19/18
 * Time: 20:04
 */
include('../../views/header.php');
session_start();

?>

<div style ="margin-top: 3rem" class = "container">
    <h2>Feature Loader</h2>
    <table class="table table-sm">
        <thead class="thead-light">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Youtube Errors</th>
            <th scope="col">Google Map Errors</th>
            <th scope="col">Group Card Errors</th>
            <th scope="col">Profile Card Errors</th>
            <th scope="col">Profile Edit Errors</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach()
        ?>
        <tr>
            <th scope="row">nick.sladic@yahoo.com</th>
            <td>Nick</td>
            <td>Sladic</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
        </tr>
        </tbody>
    </table>
</div>

<?php
    include('../../views/footer.php');
?>

