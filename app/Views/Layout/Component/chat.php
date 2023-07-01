<div class="ngambang">

  <div class="collapse" id="collapseExample">
    <div class="card card-body" style="width: 25rem;">
      <div id="messagesh">

      </div>
      <div class="row" id="messages">

      </div>
    </div>
  </div>
  <button class="float-end btn text-black btn-primary bt-chat" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Let’s Chat!
  </button>
</div>



<script>
  const array =JSON.parse('<?=json_encode(setting('Aplikasi.chat'))?>');
 /*   [{
      'tanya': 'berap1a?',
      'jawap': 'karena1'
    },
    {
      'tanya': 'berapa2?',
      'jawap': 'karena2'
    },
    {
      'tanya': 'berapa3?',
      'jawap': 'karena3'
    }
  ]; */
  tampil();

  function tampil() {
    for (var i = 0; i < array.length; i++) {
      g = '<button type="button" onclick="balas(' + i + ')" class="btn m-1 btn-primary btn-sm">' + array[i].tanya + '</button>';
      $("#messagesh").append(g);
    }
  }

  function balas(index) {
    g = '<div class="col-12">  <span class="badge float-end text-bg-primary">' + array[index].tanya + '</span></div>';
    g += '<div class="col-12"><span class="">🦸 ' + array[index].jawap + '</span></div>';
    //   g='<button type="button" onclick="balas('+i+')" class="btn m-1 btn-primary btn-sm">'+array[i].tanya+'</button>';
    $("#messages").append(g);
  }
</script>