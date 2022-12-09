 const commentForm = document.getElementById("contactForm");
 const commentSave = document.getElementById("commentSave");
 var blogId;
window.onload = async function() {
    blogId = localStorage.getItem('blogId'); 
    getBlogbyId(blogId)
    var token = localStorage.getItem('token'); 
    let auth=JSON.parse(token)
    if (auth.token) { 
        getUser()
    }
  };
  
  async function getUser() {
    let data=  document.getElementById('user-section')   
    var element = '<div class="info"><ul class="clearfix"><li><a class="custom" onclick="logout()"><i class="fa-solid fa-right-to-bracket"></i><span class="txt">Logout</span></a></li></ul></div><div class="link-box"><a href="profile.html" class="theme-btn btn-style-one "><span class="btn-title custom custom">My Profile</span></a></div>';
    data.innerHTML=element
  }
  
  async function logout(){
    localStorage.removeItem('token')
    location.reload()
  }
  async function getBlogbyId(blogId) {
   // console.log(blogId);
        let data =  document.getElementById('blog-data')
        const response = await fetch('http://localhost:3000/public/blogById?id='+blogId, {
            method: 'GET',
            headers: {
            'Content-Type': 'application/json'
            }
        });
        const resp = await response.json();
        //console.log(resp);
        let url='http://localhost:3000/public/'+resp.cover
        var element = '<div class="image-box"><div class="date"><span class="day">'+resp.date.split('-')[2]+'</span>'+resp.date.split('-')[1]+'</div><figure class="image"><img src='+url+' alt="" title=""></figure></div><div class="lower-box"><div class="post-meta"><ul class="clearfix"><li><a href="#"><span>'+resp.author+'</span></a></li><li><a href="#"><span>'+resp.category+'</span></a></li></ul></div><h3><a>'+resp.title+'</a></h3><div class="text"><p>'+resp.content+'</p></div></div>';
        data.innerHTML=element

        getBlogs(blogId)  
        getComments(blogId)  
  }

  async function getBlogs(blogId) {
    let html=''
    let data=  document.getElementById('related-blog')
    const response = await fetch('http://localhost:3000/public/blog?offset=0&limit=4', {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json'
        }
    });
    const resp = await response.json();
   // console.log(resp);
   
    for (let i = 0; i < resp.length; i++) {
        if (resp[i].id!=blogId) {
           // console.log(resp[i].id);
            let url='http://localhost:3000/public/'+resp[i].cover
        var element = '<div class="post"><figure class="post-thumb"><img src='+url+' alt=""></figure><div class="info">'+resp[i].date+'</div><h5 class="text"><a onclick="getBlogbyId('+resp[i].id+')">'+resp[i].title+'</a></h5></div>';
        html=html+element;
        if ((resp.length-1)==i) {
            data.innerHTML=html
        }
        }
    }
  }

  async function getComments(blogId){
    var html=''
    let data=  document.getElementById('comments')
    const response = await fetch('http://localhost:3000/public/blogComment?blogId='+blogId, {
        method: 'GET',
        headers: {
        'Content-Type': 'application/json'
        }
    });
    const resp = await response.json();
    //console.log(resp);
    for (let i = 0; i < resp.length; i++) { 
        var element = '<div class="comment-box"><div class="comment"><div class="info"><div class="name">'+resp[i].commentedBy+'</div><div class="date">'+resp[i].date+'</div></div><div class="text">'+resp[i].comment+'</div></div></div>';
        html=html+element;
        if ((resp.length-1)==i) {
            data.innerHTML=html
        }
    }
  }

  commentSave.addEventListener("click", async(e) => {
    e.preventDefault();
    let data={}
    data.commentedBy=commentForm.username.value
    data.comment=commentForm.message.value
    data.reserve=commentForm.email.value
    data.blogId=blogId;
   
    const response = await fetch('http://localhost:3000/public/blogComment', {
      method: 'POST',
      body:JSON.stringify(data) ,
      headers: {
        'Content-Type': 'application/json'
      }
    });
    console.log(response);
    if (response.status==200) {
      location.reload()
    }
  })