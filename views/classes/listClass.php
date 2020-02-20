<?php
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
include_once $webpath . "site_header.php";
include_once $webpath . "util/DatabaseConnection.php";
include_once $webpath . "controls/parent/parent.php";
include_once $webpath . "controls/classrooms/class.php";
include_once $webpath . "controls/classrooms/stream.php";
include_once $webpath . "controls/student/student.php";

$classes = new Class_Rooms();
$stream = new Streams();
$parent = new Parents();
$students = new Student();
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto; text-align: center;">
            <h1 class="page-header" style="color:#00a7da; font-weight: bold"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="margin: 0 auto;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class=" col-lg-12">
                            <h4>List of Classes</h4>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table data-toggle="table" id="userTable" class="table table-bordered"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                            <tr role="row">
                                <th># </th>
                                <th>Name</th>
                                <th>Streams</th>
                                <th>Students</th>
                                <th>Class Teacher</th>
                                <th>Total Students</th>
                                <th>Parents</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $count = 0;
                            foreach ($classes->selectAllClasses() as $classes) {
                                $parent_names = "";
                                $parent_phones = "";
                                $streams = '';
                                $student_subTotal = '';
                                $student_total =0;
                                $parents_total = '';
                                foreach ($stream->selectStreamByClassId($classes->id) as $stream) {
                                    $streams .= $stream->name . '<br/>';
                                    $counters = 0;
                                    $parents_sub = 0;
                                    foreach ($students->selectStudentByStream($stream->id) as $students) {
                                        $counters+=1;
                                        if($students->parent1>0||$students->parent2>0||$students->nok>0){
                                            $parents_sub+=1;
                                        }
                                    }
                                    $student_total +=$counters;
                                    $student_subTotal.=$counters.'<br/>';
                                    $parents_total .=$parents_sub.'<br/>';
                                }

                                $count += 1;
                                echo '<tr role="row" class="odd">';
                                echo "<td> " . $count . " </td>";
                                echo "<td> " . $classes->name . " </td>";
                                echo "<td>" . $streams . "</td>";
                                echo "<td> " . $student_subTotal . " </td>";
                                echo '<th>Class Teacher<br/>Class Teacher</th>';
                                echo "<td> " . $student_total . " </td>";
                                echo "<td> ".$parents_total." </td>";
                                echo '<td>'
//                                . ' <a href=\'views/classes/editClass.php?class_id=' . $classes->id . '\' class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></a>'
                                . '<a href=\'views/classes/viewClass.php?class_id=' . $classes->id . '\' class="fa fa-eye" data-toggle="tooltip" data-placement="right" title="View Class"></a>' . ' '
                                . '</div></td>';
                                echo '</tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <!-- /.row -->

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->


<?php include_once $webpath . 'site_footer.php'; ?>

<script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            responsive: true
        });
    });
</script>


