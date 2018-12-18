<p>Главная страница</p>
<div class="container">
    <div class="d-flex flex-column justify-content-center">
        <?php foreach ($news as $val): ?>
            <div>
                <div class="card" style="width: 200px; margin: 20px auto">
                    <img style="width:200px" src=/app/uploads/<?php echo $val['image']; ?> />
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $val['title']; ?> <button type="button" class="btn btn-danger delete_post" value=<?php echo $val['id']?> >Delete</button></h5>
                        <p class="card-text"><?php echo $val['body']; ?></p>
                        <a href=http://news/all/<?php echo $val['id'];?> delete-post class="btn btn-primary">Read more...</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        <?=$pagination;?>
    </div>
    <form id="form_post" action="http://news/add" method="post" enctype=multipart/form-data>
        <div class="form-group">
            <label for="exampleFormControlInput1">Title your post</label>
            <input type="text" class="form-control" name="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text your post</label>
            <textarea class="form-control" name="body" rows="3" placeholder="text"></textarea>
        </div>
        <input type="file" name="image" value="add">
        <button type="submit" class="btn btn-primary">Add your post</button>
    </form>

</div>
