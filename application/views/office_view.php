<div class="container pt-4">
    <?php if (!empty($_SESSION['status'])): ?>
        <?php if ($_SESSION['status'] == 'admin'): 
            header("Location: admin");
        ?>
        <?php elseif ($_SESSION['status'] == 'client'):  
            header("Location: client");
        ?>    
        <?php elseif ($_SESSION['status'] == 'web-dev'):  
            header("Location: webdev");
        ?>     
        <?php endif ?>
        <br>
        <Button type="button" class="btn btn-outline-warning"><a href="/logout">Выйти</a></Button>
    <?php else: (header("HTTP/1.0 404 Not Found"));?>
    <?php endif ?> 
</div>


