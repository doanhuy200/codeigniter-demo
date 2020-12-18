<div class="row">
	<div class="col-lg-12">
		<h2>Posts CRUD
			<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url('posts/create') ?>"> Create New Product</a>
			</div>
		</h2>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-bordered" id="postTable">
		<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($posts as $item) { ?>
			<tr>
				<td><?php echo $item->title; ?></td>
				<td><?php echo $item->description; ?></td>
				<td>
					<form method="DELETE" action="<?php echo base_url('posts/delete/' . $item->id);?>">
						<a class="btn btn-info btn-xs" href="<?php echo base_url('posts/edit/' . $item->id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
						<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
					</form>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript" language="javascript" >
	$(document).ready(function() {
		function fetch_data()
		{
			$.ajax({
				url:"<?php echo base_url(); ?>api/posts",
				method:"POST",
				data:{data_action:'fetch_all'},
				success:function(data)
				{
					dataResponse = JSON.parse(data)['posts'];
					$.each(dataResponse, function (index) {
						console.log(dataResponse[index])
						// alert("id= "+data[index].id+" name="+data[index].name);
						$('#postTable tbody').append(
							"<tr>" +
								"<td>" + dataResponse[index].title + "</td>" +
								"<td>" + dataResponse[index].description + "</td>" +
								"<td>" +
									"<form method="DELETE" action="<?php echo base_url('posts/delete/' . $item->id);?>">" +
									<a class="btn btn-info btn-xs" href="<?php echo base_url('posts/edit/' . $item->id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
									<button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
									</form>"
								"</td>" +
							"</tr>"
						);
					});
				}
			});
		}

		fetch_data();
	});

</script>
