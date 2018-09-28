<?php
$connect = mysqli_connect("localhost", "root", "", "pcmaisum");
$output = '';
$sql = "SELECT * FROM produtos WHERE nome LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0)
{
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '<div class="table-responsive">
                    <table class = "table table bordered">
                        <tr>
                            <th> nome </th>
                            <th> preco </th>
                        </tr>;'
    while($row = mysqli_fetch_array($result))
    {
        $output .= ' 
            <tr>
                <td>' .$row["nome"].'</td>
                <td>' .$row["preco"].'</td>
            </tr>
        ';
    }
    echo $output;
}
else
{
    echo 'Produto não encontrado';
}
?>