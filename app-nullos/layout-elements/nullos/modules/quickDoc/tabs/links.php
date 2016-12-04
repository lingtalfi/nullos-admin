<h3>I'm the links</h3>


<form action="" method="post" class="key2value-form">
    <table>
        <tr>
            <th>Keys</th>
            <th>Values</th>
        </tr>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <tr>
                <td>crud</td>
                <td><input type="text" name="links[crud]" value="http://crud.com"></td>
            </tr>
        <?php endfor; ?>
    </table>
</form>