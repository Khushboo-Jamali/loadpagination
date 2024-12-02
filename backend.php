<?php
$conn = mysqli_connect('localhost', 'root', '', 'ajax');
$limit = 5;
// if (isset($_POST['page_no'])) {
//     $page = $_POST['page_no'];
// } else {
//     $page = 0;
// }


$page = isset($_POST['page_no']) ? (int)$_POST['page_no'] : 0;

// Calculate the offset (page number starts at 0, so it's multiplied by the limit)
$offset = $page * $limit;


$sql = "SELECT * FROM emp LIMIT $offset, $limit";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    $output = "";
    $output .= "<tbody>";
    while ($row = mysqli_fetch_assoc($query)) {
        $last_id = $row['id'];
        $output .= "

                        <tr>
                            <td >{$row['id']}</td>
                            <td>{$row['email']}</td>
                        </tr>
                    ";
    }
    $output .= "
                    </tbody>
                    <tbody id='pagaination'>
                        <tr>
                            <td colspan='3' class='text-center'><button id='ajaxbtn' data-id='" . ($page + 1) . "'>Load More Data</button></td>
                        </tr>
                    </tbody>";
    echo $output;
} else {
    echo "no data";
}
mysqli_close($conn);
