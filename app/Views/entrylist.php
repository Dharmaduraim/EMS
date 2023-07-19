              
              <!-- /.card-header -->
  <?php
      $session=session();

          if($msg=$session->getFlashdata('flash_message'))
          {

             echo $msg;
          }
        ?>


                   <h2 id="head">Data Entry List DataTable</h2>

                <table id="myTable" class="table-sortable">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>date</th>
                   <th>age</th>
<!--                     <th>View</th>
 -->                    <th>Update</th>
                    <th>Delete
                  </tr>
                  </thead>


  <?php
  $i=1;
  foreach($result as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->name."</td>";
  echo "<td>".$row->email."</td>";
  echo "<td>".$row->date."</td>";
    echo "<td>".$row->age."</td>";

  // echo "<td><a href='viewuserprofile/".$row->id."'>View</a></td>";
  echo "<td><a href='edit/".$row->id."'>update</a></td>";
  echo "<td><a href='delete/".$row->id."'>Delete</a></td>";
  echo "</tr>";
  $i++;
  }
  ?>

</table>
<div id="link">
<a href="<?php echo site_url('home/register');?>">Add Data</a></div>

<style>
  
  <style>

* {
  margin: 0;
  padding: 0;
  text-align:center;
}

body {
  background-color: #fafafa;
}
table, th, td {
  border: 1px solid black;
}

table {
  color: #333;
  font-size: .9em;
  font-weight: 300;
  line-height: 40px;
  border-collapse: separate;
  border-spacing: 0;
  border: 2px solid #453f9b;
  width: 500px;
  margin: 50px auto;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,.16);
  border-radius: 2px;
}

th {
  background: #453f9b;
  color: #fff;
  border: none;
}

#myTable tr:nth-child(even){background-color: #f2f2f2;}

tr:hover:not(th) {background-color: rgba(237,28,64,.1);}


input[type="button"] {
  transition: all .3s;
    border: 1px solid #ddd;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
  font-size: 15px;
}

input[type="button"]:not(.active) {
  background-color:transparent;
}

.active {
  background-color: #ff4d4d;
  color :#fff;
}

input[type="button"]:hover:not(.active) {
  background-color: #ddd;
}
h2 {
    display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
#head{
  align-items: center;
  text-align: center;
  color: red;

}
#link{
   align-items: center;
  text-align: center;
  color: blue;
}
</style>
<script>
  function sortTableByColumn(table, column, asc = true) {
  const dirModifier = asc ? 1 : -1;
  const tBody = table.tBodies[0];
  const rows = Array.from(tBody.querySelectorAll("tr"));

  // Sort each row
  const sortedRows = rows.sort((a, b) => {
    const aColText = a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
    const bColText = b.querySelector(`td:nth-child(${column + 1})`).textContent.trim();

    return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
  });

  // Remove all existing TRs from the table
  while (tBody.firstChild) {
    tBody.removeChild(tBody.firstChild);
  }

  // Re-add the newly sorted rows
  tBody.append(...sortedRows);

  // Remember how the column is currently sorted
  table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
  table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-asc", asc);
  table.querySelector(`th:nth-child(${column + 1})`).classList.toggle("th-sort-desc", !asc);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
  headerCell.addEventListener("click", () => {
    const tableElement = headerCell.parentElement.parentElement.parentElement;
    const headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
    const currentIsAscending = headerCell.classList.contains("th-sort-asc");

    sortTableByColumn(tableElement, headerIndex, !currentIsAscending);
  });
});

</script>
