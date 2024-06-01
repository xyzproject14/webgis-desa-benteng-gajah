
function detail(data){
            
    let modal = document.getElementById('modal')
    let perangkatDesa = ''
    if(data == 'Staff Inti'){
        perangkatDesa = 'staf inti'
    }else if(data == 'Kepala Dusun'){
        perangkatDesa = 'Kepala Dusun'
    }else{
        perangkatDesa = 'staf'
    }

    let perangkat = []
    $(document).ready(function(){
        $.ajax({
            
            url: "{{ route('data pemerintah') }}",
            type: "GET",
            dataType: 'json',
            success: function(response){
                for(data of response){
                    if(data.type == perangkatDesa){
                        let container = document.createElement('div')
                        container.classList.add('w-80' ,'opacity-100' ,'bg-white', 'rounded-lg', 'flex', 'flex-col', 'items-center')
                        // console.log(data.nama);
                        
                        let nama = document.createElement('p')
                        nama.classList.add('font-bold', 'text-2xl')
                        let jabatan = document.createElement('span')

                        nama.innerText = data.nama
                        jabatan.innerText = data.jabatan
                        
                        container.innerHTML = ''
                        container.append(nama, jabatan)
                        // console.log(container);
                        
                        modal.appendChild(container)
                        console.log(modal);
                        
                    }
                }
                
            }
        })
    })
}