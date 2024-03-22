import React from 'react'
import {useState, useEffect} from 'react';
import todo from '../todo.json';
import {useParams} from 'react-router-dom';

const TaskPage = () => {
  const [task, setTask] = useState(0);
  const {id} = useParams();

  useEffect(() => { 
    const fetchTask = () => {
      try{
        const data = todo.find(item => item.id === parseInt(id));
        setTask(data);
      } catch (error){
        console.log('Error', error);
      }
    }
    fetchTask();
  }, [id]);
  return (
    <h1>{task.title}</h1>
  )
};


export default TaskPage;