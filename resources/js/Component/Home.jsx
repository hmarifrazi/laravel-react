import React,{useEffect,useState} from 'react';
import axios from 'axios';
import { render } from 'react-dom';


function Home(){
  const [Post, setPost]=useState([]);
    useEffect(()=>{
        console.log(Post)
    })
    const fetchPost = ()=>{
         axios.get(`http://127.0.0.1:8000/api/posts`).then((d)=>{ setPost(d.data) })
    }
    window.onload=function(){
        fetchPost()
    }
    
  render(
      <>
    
      </>
  );

}
export default Home;