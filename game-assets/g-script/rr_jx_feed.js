async function createRoom() {
          const response =fetch('api/index.php',{
                method:'POST',
                headers: new Headers({
                    'Content-Type':'application/x-www-form-urlencoded'
                }),
                body:"module=add_player&name=test_name"
          }).then(async (res) => {
           data = await res.json();
           console.log(data) 
          }).catch((error) => {
                console.error(error);
            });
}