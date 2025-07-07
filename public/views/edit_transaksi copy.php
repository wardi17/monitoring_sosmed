<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- CSS Styling -->
<style>
  .error {
    color: red;
  }

  .ldBar path.mainline {
    stroke-width: 10;
    stroke: #09f;
    stroke-linecap: round;
  }

  .ldBar path.baseline {
    stroke-width: 14;
    stroke: #f1f2f3;
    stroke-linecap: round;
    filter: url(#custom-shadow);
  }

  .loading-spinner {
    width: 30px;
    height: 30px;
    border: 2px solid indigo;
    border-radius: 50%;
    border-top-color: #0001;
    display: inline-block;
    animation: loadingspinner 0.7s linear infinite;
  }

  @keyframes loadingspinner {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  #progressBar {
    width: 100%;
    background-color: #f3f3f3;
    border-radius: 5px;
    display: none;
  }

  #progressBar div {
    height: 20px;
    width: 0%;
    background-color: #4caf50;
    text-align: center;
    line-height: 20px;
    color: white;
    border-radius: 5px;
  }
</style>

<!-- Main Layout -->
<div id="main">
  <?php include 'views/pages/burger.php'; ?>
  <div id="header_data"></div>

  <!-- Basic Tables -->
  <div id="tabelhead"></div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h1 class="modal-title fs-5">Delete Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="formdelete">
          <div class="row col-md-12 mb-3">
            <label class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-md-4">
              <input type="text" disabled class="form-control" id="tanggal_delete" value="">
            </div>
          </div>

          <div class="row col-md-12 mb-3">
            <label class="col-sm-3 col-form-label">Kode</label>
            <div class="col-md-3">
              <input type="text" disabled class="form-control" id="kode_delete" value="">
            </div>
          </div>

          <div class="row col-md-12 mb-3">
            <label class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-md-3">
              <input type="text" disabled class="form-control" id="ktg_delete" value="">
            </div>
          </div>

          <div class="row col-md-12 mb-2">
            <label class="col-sm-3 col-form-label">Divisi</label>
            <div class="col-md-2">
              <div class="form-check form-check-inline">
                <input class="form-check-input checkdivisi_dl" type="checkbox" id="cs_dl" name="divisi" required>
                <label class="form-check-label" for="cs">CS</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input checkdivisi_dl" type="checkbox" id="pd3r_dl" name="divisi" required>
                <label class="form-check-label" for="pd3r">PD3R</label>
              </div>
            </div>
          </div>

          <div class="col-sm-11 d-flex justify-content-end">
            <button type="submit" id="delete" class="btn btn-primary me-1 mb-3">Yes</button>
            <button type="button" class="btn btn-secondary me-1 mb-3" data-bs-dismiss="modal">No</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Form -->
<div id="formdata_edit">
  <div id="main">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h3>Edit Upload</h3>
        </div>

        <div class="card-content">
          <div class="card-body">
            <button onclick="goBack()" class="btn btn-lg mb-4"><i class="fa-solid fa-arrow-left"></i></button>

            <div id="progressBar"><div>0%</div></div>
            <p id="status"></p>

            <form id="formedit" class="form form-horizontal">
              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Divisi</label>
                <div id="divisi" class="col-md-2"></div>
              </div>

              <div class="row col-md-12 mb-3">
                <label class="col-sm-3 col-form-label">Tanggal Upload</label>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="tanggal" id="tanggal" required>
                </div>
              </div>

              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Kategori</label>
                <div id="kategori" class="col-md-9"></div>
              </div>

              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="judul" id="judul" required>
                </div>
              </div>

              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Kode</label>
                <div class="col-sm-4">
                  <input type="text" disabled class="form-control" name="kode" id="kode" required>
                </div>
              </div>

              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Tujuan</label>
                <div class="col-sm-4">
                  <textarea class="form-control" name="tujuan" id="tujuan" required></textarea>
                </div>
              </div>

              <div class="row mb-2">
              <label class="col-sm-3 col-form-label">Upload Video (MP4):</label>
              <div class="col-sm-4">
                <!-- input file disembunyikan -->
                <input type="file" id="videoUpload" accept="video/mp4" style="display: none;" required>
                <!-- tombol trigger upload -->
                <button type="button" id="uploadBtn" class="btn btn-primary mt-2">Pilih Video</button>
                  <!-- nama file tampil di sini -->
                  <div id="videoFileName" class="mt-2 text-muted"></div>
                  <!-- tombol hapus -->
                  <button type="button" id="removeBtn" class="btn btn-danger mt-2" style="display: none;">Hapus Video</button>
                </div>
                <span id="videoUploadError" class="error"></span>
              </div>
              <!-- preview video -->
              <div class="row mb-2">
                <label class="col-sm-3 col-form-label">Preview Video:</label>
                <div class="col-sm-4">
                  <video id="videoPreview" width="320" height="240" controls style="display: none;"></video>
                </div>
              </div>


              <!-- Link -->
              <div class="row col-md-12 mb-2">
                <label class="col-sm-3 col-form-label">Link URL</label>
                <div class="col-sm-4">
                  <input type="url" class="form-control" name="link" id="link" required>
                </div>
              </div>

              <!-- Keterangan -->
              <div class="row col-md-12">
                <label class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-4">
                  <textarea class="form-control" name="ket" id="ket" required></textarea>
                </div>
              </div>

              <!-- Buttons -->
              <div class="col-sm-11 d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary me-1 mb-3" id="Save_edit">Save</button>
                <button type="button" class="btn btn-danger me-1 mb-3" id="Deletedata">Delete</button>
                <button type="button" class="btn btn-secondary me-1 mb-3" onclick="goBack()">Close</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- end edit transaksi -->
<script>
$(document).ready(function(){

// Klik tombol akan memicu klik input file
document.getElementById('uploadBtn').addEventListener('click', function () {
  document.getElementById('videoUpload').click();
});

// Saat file dipilih
document.getElementById('videoUpload').addEventListener('change', function () {
  const file = this.files[0];
  if (file && file.type === 'video/mp4') {
    const videoURL = URL.createObjectURL(file);
    document.getElementById('videoPreview').src = videoURL;
    document.getElementById('videoPreview').style.display = 'block';

    // Tampilkan nama file
    document.getElementById('videoFileName').textContent = file.name;

    // Tampilkan tombol hapus
    document.getElementById('removeBtn').style.display = 'inline-block';

    // Sembunyikan tombol pilih
    document.getElementById('uploadBtn').style.display = 'none';
  } else {
    document.getElementById('videoUploadError').textContent = 'Mohon pilih file video dengan format .mp4';
  }
});

// Saat tombol hapus diklik
document.getElementById('removeBtn').addEventListener('click', function () {
  // Reset
  document.getElementById('videoUpload').value = '';
  document.getElementById('videoPreview').src = '';
  document.getElementById('videoPreview').style.display = 'none';
  document.getElementById('videoFileName').textContent = '';
  this.style.display = 'none';
  document.getElementById('uploadBtn').style.display = 'inline-block';
});





  $("#formdata_edit").hide();
  const dateya = new Date();
    let bulandefault = dateya.getMonth()+1;
    let tahundefault = dateya.getFullYear();
    let tahun = tahundefault;
    getbulan(tahun);
    tahun_edit();
    get_data_divisi();
    get_data_kategori();
   
   

    // delete data 
    $("#Deletedata").on("click",function(e){
        e.preventDefault();
        let kode = $("#kode").val();
      
        $.ajax({
            url:"models/upload_transaksi/delete_data.php",
            type:"POST",
            data:{kode:kode},
                dataType:'json',                  
            success: function(result){ 
          
                  Swal.fire({         
                            position: 'top-center',
                            icon: 'success',
                            title:"Data Berhasi di hapus",
                          }).then(function(){ 
                            location.reload();
                          }); 
            }
        
        })
    });
    //end delete data

// Edit data
$(document).on("click", ".open-edit", function() {
    $("#header_data").hide();
    $("#tabelhead").hide();
    $("#formdata_edit").show();
    
    let kode = $(this).data('id');

    $.ajax({
        url: 'models/upload_transaksi/update_data.php',
        method: 'POST',
        data: { kode: kode },
        cache: true,
        dataType: 'json',
        success: function(response) {
            $.each(response, function(key, value) {
                let kode = value.kode;
                let tgl = value.tanggal;
                let tgls = moment(tgl).toDate();
                let tanggal = moment(tgls).format('DD/MM/YYYY');
                let divisi = value.divisi;
                let kategory = value.kategory;
                let judul = value.judul;
                let ket = value.ket;
                let link = value.link;
                let tujuan = value.tujuan;
                let nama_document = value.nama_document;

                // Set checked state for category
                if (kategory !== '') {
                    let ktg = "#" + kategory;
                    $(ktg).prop("checked", true);
                }

                // Set checked state for division
                if (divisi !== '') {
                    let id_div = "#" + divisi;
                    $(id_div).prop("checked", true);
                }

                // Set form values
                $("#kode").val(kode);
                $("#tanggal").val(tanggal);
                $("#judul").val(judul);
                $("#tujuan").val(tujuan);
                $("#link").val(link);
                $("#ket").val(ket);

                // Check if video document exists
                if (nama_document) {
                    // Set video preview
                    const videoURL = `<?=url_store?>${nama_document}`;
                    $("#videoPreview").attr("src", videoURL).show();

                    // Show remove button
                    document.getElementById('removeBtn').style.display = 'inline-block';

                    // Hide upload input
                    document.getElementById('videoUpload').style.display = 'none';
                    document.getElementById('uploadBtn').style.display = 'none';
                } else {
                    // If no video, hide video preview and remove button
                    $("#videoPreview").hide();
                    document.getElementById('removeBtn').style.display = 'none';

                    // Show upload input and add button
                    document.getElementById('videoUpload').style.display = 'block';
                    document.getElementById('uploadBtn').style.display = 'inline-block';
                }

                // Add event listener for remove button
                document.getElementById('removeBtn').addEventListener('click', function() {
                    // Hide video and remove button
                    document.getElementById('videoPreview').style.display = 'none';
                    this.style.display = 'none';

                    // Show upload input
                    document.getElementById('videoUpload').style.display = 'block';
                    document.getElementById('uploadBtn').style.display = 'inline-block';

                    // Clear video source
                    document.getElementById('videoPreview').src = '';
                });
            });
        }
    });
});
// End data edit


   
   //simpan edit data
  $("#Save_edit").on('click',function(e){
    e.preventDefault();
    let divisi = $("input[type=radio][name=divisi]:checked").val();
    let kategory = $("input[type=radio][name=kategori]:checked").val();
    let kode = $("#kode").val();
    let tgl = $('#tanggal').val();
    let tanggal = myformat(tgl);

    let judul = $('#judul').val();
    let tujuan = $('#tujuan').val();
    let link = $("#link").val();
    let ket = $("#ket").val();
    $.ajax({
      url:'models/upload_transaksi/edit_data_transaksi.php',
      method:'POST',
       data:{kode:kode,kategory:kategory,divisi:divisi,tanggal:tanggal,judul:judul,tujuan:tujuan,link:link,ket:ket},
       cache:true,
       dataType:'json',
       success:function(result){
        let status = result.error;
        Swal.fire({
                position: 'top-center',
              icon: 'success',
              title: status,
              }).then(function(){
                location.reload();
              }); 
          
       }
    })
  });
  //end simpan edit data

});


  

function tahun_edit(){
 
 let startyear = 2020;
 let date = new Date().getFullYear();
 
 let endyear = date + 2;
 
 for(let i = startyear; i <=endyear; i++){
   var selected = (i !== date) ? 'selected' : date; 

  $("#tahunedit").append($(`<option />`).val(i).html(i).prop('selected', selected));

 }
}


function getbulan(tahun){

    let dataTable =``;
    $.ajax({
            url:'models/rpt_target/get_bulanjs.php',
            method:'POST',
            data:{tahun:tahun},
            dataType:'json',      
            success:function(result){
             

                if(result == null){
                    get_header(tahun);
                }else{
                    get_header(tahun);
                    get_tables();
                    $.each(result,function(key,value){
                       let month =value.bulan;
                       let years = value.tahun
                       showdata(years);
                    })
                }
            }
    });      
} 
function get_header(tahun){
    let data_headr =`

    <div  class="page-heading mb-3">
    <div class="page-title">
    <h4 class="text-center">Edit Transaksi Upload </h4>
    </div></div>

    `;
    $("#header_data").html(data_headr);
}
function get_tables(){
    //   let id ="#"+tabel;
    //   let substr_bulan = bulan.substr(0,3);
        let dataTable =`
        <section class="section">
                <div class="card">
                    <div class="card-body">
                    <table id="tabel1" class='display table-info' style='width:100%'>                    
                                    <thead  id='thead'class ='thead'>
                                    <tr>
                                                <th style="width:7%">Tanggal</th>
                                                <th style="width:2%">Kode</th>
                                                <th style="width:2%">Kategori</th>
                                                <th style="width:2%">Divisi</th>
                                                <th style="width:15%">Judul</th>
                                                <th style="width:15%">Tujuan</th>
                                                <th style="width:15%">Ket</th>
                                                <th style="width:1%"><p class="text-center">Action &nbsp &nbsp</p></th>  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table><br>
                                </div>
                            </div>
                        </section>

        `;
    $("#tabelhead").empty().html(dataTable);
};
function showdata(years){
     $("#formdata_edit").hide();
        $.ajax({
            url: 'models/upload_transaksi/tampildata.php',
            method :'POST',
            data:{tahun:years},
            cache:true,
            dataType:'json',
            success: function(response){

                $("#tabel1").DataTable({
                    response :true,
                    "ordering": false,
                    "destroy":true,
                    // dom: 'Plfrtip',
                    //     scrollCollapse: true,
                    paging:true,
                    //     "bPaginate":false,
                    //     "bLengthChange": false,
                    //     "bFilter": true,
                    //     "bInfo": false,
                    //     "bAutoWidth": false,
                    //     dom: 'lrt',
                        fixedColumns:   {
                        // left: 1,
                            right: 1
                        },
                        pageLength: 5,
                        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
                                    
                        data: response,
                            columns: [
                                { 'data': 'tanggal' },
                                { 'data': 'kode' },
                                { 'data': 'kategory' },
                                { 'data': 'divisi' },
                                { 'data': 'judul' },
                                { 'data': 'tujuan' },
                                { 'data': 'ket' },

                                { "render": function ( data, type,row) { // Tampilkan kolom aksi
                                  let html  =`<button type="button"   data-id="${row.kode}" class=" open-edit btn btn-lg btn-space"><i class="fa-regular fa-pen-to-square"></i></button>`

                                return html
                                 }
                                },
                            ]      
                
                });
            }
        });

    };

      // UNTUK MENAMILKAN DATA DIVISI
function get_data_divisi(){

  $.ajax({
          url:'models/master_divisi/tampildata.php',
          method:'POST',
          dataType:'json',      
          success:function(response){
                let data =``;
              $.each(response,function(key,value){
                let divisi = value.nama_divisi;
                data +=`
                <div class="form-check form-check-inline">
                                <input class="form-check-input check_divisi" for ="${divisi}" type="radio" id="${divisi}" name="divisi" value="${divisi}" required>
                                <label class="form-check-label" for ="${divisi}">${divisi}</label>
                    </div>
                `;

              });
              $("#divisi").empty().html(data);  
          }

        });
}
//END DATA DIVISI
      // UNTUK MENAMILKAN DATA DIVISI
      function get_data_kategori(){
        $.ajax({
                url:'models/master_target/tampildata.php',
                method:'POST',
                dataType:'json',      
                success:function(response){
                  
                      let data =``;
                    $.each(response,function(key,value){
                     
                      let ktg = value.kategory;
                      data +=`
                      <div class="form-check form-check-inline">
                                      <input class="form-check-input check_kategori" for ="${ktg}" type="radio" id="${ktg}" name="kategori" value="${ktg}" required>
                                      <label class="form-check-label" for ="${ktg}">${ktg}</label>
                          </div>
                      `;

                    });
                    $("#kategori").empty().html(data);  
                }

              });
      
      }
//END DATA DIVISI
function goBack(){
  $("#formedit").trigger("reset");
  $("#tabelhead").show();
    $("#formdata_edit").hide();
    $("#header_data").show();

     
}
//untuk format tanggal simpan edit
function myformat(date){
   
    let d = date.split('/')[0];
    let m = date.split('/')[1];
    let y = date.split('/')[2];
    let format = y + "-" + m + "-" + d;
    
    return format;
  }

  $( function() {
        $( "#tanggal" ).datepicker(
          {dateFormat : 'dd/mm/yy'}
        );
     
  });
</script>