<div class="sidebar" style="background-color: #f8f9fa; border-radius: 5px; padding: 15px;">
    <h3 class="title" style="color: #000; font-size: 20px; margin-bottom: 10px;">MENU</h3>
    <ul style="list-style: none; padding: 0;">
        <?php foreach ($data["category"] as $value) : ?>
            <li style="margin-bottom: 5px;"><a href="<?= URL ?>index.php/home/category/<?= $value["id"] ?>/1" style="color: #6c757d; text-decoration: none; font-size: 16px;"><?= $value["category_name"] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>