 <!-- MODAL ADD -->
    <form>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 1</label>
                    <div class="col-md-10">
                      <input type="text" name="data1" id="data1" class="form-control" placeholder="data 1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 2</label>
                    <div class="col-md-10">
                      <input type="text" name="data2" id="data2" class="form-control" placeholder="data 2">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 3</label>
                    <div class="col-md-10">
                      <input type="text" name="data3" id="data3" class="form-control" placeholder="data 3">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" type="submit" id="btn_save" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data ID</label>
                    <div class="col-md-10">
                      <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="Product Code" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 1</label>
                    <div class="col-md-10">
                      <input type="text" name="data1_edit" id="data1_edit" class="form-control" placeholder="data 1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 2</label>
                    <div class="col-md-10">
                      <input type="text" name="data2_edit" id="data2_edit" class="form-control" placeholder="data 2">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Data 3</label>
                    <div class="col-md-10">
                      <input type="text" name="data3_edit" id="data3_edit" class="form-control" placeholder="data 3">
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
    </form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
 <form>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
               <strong>Are you sure to delete this record?</strong>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="id" id="id" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
    </form>
<!--END MODAL DELETE-->
 <script>
    $(document).ready(function(){
        show_product(); //call function show all product
         
        //$('#datas').dataTable();
          
        //function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('create/data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].data1+'</td>'+
                                '<td>'+data[i].data2+'</td>'+
                                '<td>'+data[i].data3+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-data1="'+data[i].data1+'" data-data2="'+data[i].data2+'" data-data3="'+data[i].data3+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //Save product
        $('#btn_save').on('click',function(){
            var data1 = $('#data1').val();
            var data2 = $('#data2').val();
            var data3 = $('#data3').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('create/save')?>",
                dataType : "JSON",
                data : {data1:data1 , data2:data2, data3:data3},
                success: function(data){
                    $('[name="data1"]').val("");
                    $('[name="data2"]').val("");
                    $('[name="data3"]').val("");
                    $('#add').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).data('id');
            var data1 = $(this).data('data1');
            var data2 = $(this).data('data2');
            var data3 = $(this).data('data3');
             
            $('#edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="data1_edit"]').val(data1);
            $('[name="data2_edit"]').val(data2);
            $('[name="data3_edit"]').val(data3);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var id_edit = $('#id_edit').val();
            var data1 = $('#data1_edit').val();
            var data2 = $('#data2_edit').val();
            var data3 = $('#data3_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('create/update')?>",
                dataType : "JSON",
                data : {id_edit:id_edit, data1:data1, data2:data2, data3:data3},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="data1_edit"]').val("");
                    $('[name="data2_edit"]').val("");
                    $('[name="data3_edit"]').val("");
                    $('#edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#delete').modal('show');
            $('[name="id"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#id').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('create/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id"]').val("");
                    $('#delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
    });
 
</script>