<?php
include('classes/member.php');
?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone No.</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $member=new Member();
            $getdata = $member->fetchallData();
    if ($getdata) {
            while ($row = $getdata->fetch_assoc()) {
            ?>
                <tr>
                    <td><span id="first<?php echo $row['memberid']; ?>"><?php echo $row['firstname']; ?></span></td>
                    <td><span id="last<?php echo $row['memberid']; ?>"><?php echo $row['lastname']; ?></span></td>
                    <td><span id="phone<?php echo $row['memberid']; ?>"><?php echo $row['phone']; ?></span></td>
                    <td>
                        <a style="cursor:pointer;" class="btn btn-warning edit" data-id="<?php echo $row['memberid']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                        <a style="cursor:pointer;" class="btn btn-danger delete" data-id="<?php echo $row['memberid']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
            <?php }} ?>
        </tbody>
    </table>

