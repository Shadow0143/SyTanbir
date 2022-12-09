    const profileSave = document.getElementById("profile-save");
    const profileForm = document.getElementById("profile-form");
    const picture = document.getElementById("picture");
    var fileTag = document.getElementById("filetag");
    var imageFile;
    var bussinessFile;
    var userId;

        window.onload = async function() {
            var token = localStorage.getItem('token'); 
            let auth=JSON.parse(token)
                if (auth.token) { 
                    getUser()
                    getuserDetails(auth.user.id)
                    getImages(auth.user.id)
                    userId=auth.user.id
                }
            
            
        };
 
    
    async function getImages(userId) {
        let data=  document.getElementById('business')
        const response = await fetch('http://localhost:3000/public/business?id='+userId, {
            method: 'GET',
            headers: {
            'Content-Type': 'application/json'
            }
        });
        const resp=await response.json()
        let html=''
        for (let i = 0; i < resp.length; i++) {
            let url='http://localhost:3000/public/business/'+resp[i].image
            var element = '<div class="col-md-3 col-sm-12" ><img src='+url+' alt=""></div>';
            html=html+element;
            if ((resp.length-1)==i) {
                data.innerHTML=html
            }
        }
    }
    async function getUser() {
        let data=  document.getElementById('user-section')   
        var element = '<div class="info"><ul class="clearfix"><li><a class="custom" onclick="logout()"><i class="fa-solid fa-right-to-bracket"></i><span class="txt">Logout</span></a></li></ul></div><div class="link-box"><a href="profile.html" class="theme-btn btn-style-one "><span class="btn-title custom custom">My Profile</span></a></div>';
        data.innerHTML=element
    }
    
    async function logout(){
        localStorage.removeItem('token')
        location.reload()
    }

async function getuserDetails(userid){
    const response = await fetch('http://localhost:3000/public/userbyid?id='+userid, {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json'
        }
    });
    const resp = await response.json();
            profileForm.name.value=resp.Name
            profileForm.email.value=resp.email
            profileForm.phone.value=resp.Phone
            profileForm.gender.value=resp.Gender
            profileForm.birthday.value=resp.birthday
            profileForm.category.value=resp.Category
            profileForm.city.value=resp.city
            profileForm.state.value=resp.state
            profileForm.country.value=resp.country
            picture.innerHTML='<img src="http://localhost:3000/public/'+resp.avatar+'" id="preview" alt="" title="" width="300px" height="300px" style="border: 3px solid #cbcbcb;border-radius: 50%;"/>'
}

    fileTag.addEventListener("change", function() {
        var preview = document.getElementById("preview");
        changeImage(this);
        });

        function changeImage(input) {
            var reader;
                if (input.files && input.files[0]) {
                   // console.log(input.files[0]);
                    imageFile=input.files[0]
                    reader = new FileReader();

                    reader.onload = function(e) {
                    preview.setAttribute('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
        }

       async function savePicture(){
          let formData = new FormData();
            formData.append('file',imageFile );
            formData.append('id',userId );
            const response = await fetch('http://localhost:3000/public/user-image', {
                method: 'POST',
                body:formData , // string or object
                headers: {
                    // 'Content-Type': 'multipart/form-data'
                }
                });
                if (response.status==200) {
                    location.reload()
                }
        }


        profileSave.addEventListener("click", async(e) => {
            e.preventDefault();
            let data={}
              data.id=userId
              data.Name = profileForm.name.value;
              data.email = profileForm.email.value;
              data.Category = profileForm.category.value;
              data.Gender = profileForm.gender.value;
              data.Phone=profileForm.phone.value;
              data.birthday=profileForm.birthday.value;
              data.city=profileForm.city.value;
              data.state=profileForm.state.value;
              data.country=profileForm.country.value;
                  const response = await fetch('http://localhost:3000/public/user', {
                      method: 'PUT',
                      body:JSON.stringify(data) , 
                      headers: {
                           'Content-Type': 'application/json'
                      }
                      });
                     // console.log(response);
                      if (response.status==200) {
                          location.reload()
                      }
              
        })
  ////--------------------------------------------------------
        imageTag.addEventListener("change", function() {
            var preview = document.getElementById("preview");
            changeImage(this);
            });
    
            function changeImage(input) {
                var reader;
                    if (input.files && input.files[0]) {
                        console.log(input.files[0],input.files);
                        bussinessFile=input.files[0]
                        reader = new FileReader();
    
                        reader.onload = function(e) {
                        preview.setAttribute('src', e.target.result);
                        }
    
                        reader.readAsDataURL(input.files[0]);
                    }
            }
    
           async function saveBussiness(){
                console.log(bussinessFile);
              let formData = new FormData();
                formData.append('file',bussinessFile );
                formData.append('userId',userId );
                const response = await fetch('http://localhost:3000/public/business-image', {
                    method: 'POST',
                    body:formData , // string or object
                    headers: {
                        // 'Content-Type': 'multipart/form-data'
                    }
                    });
                    if (response.status==200) {
                        location.reload()
                    }
            }
       