import React from 'react'
import {useState, useEffect} from 'react';
import todo from '../todo.json';
import {useLoaderData, useParams} from 'react-router-dom';

const TaskPage = () => {
  const {id} = useParams();
  const task = useLoaderData();
  return (
    <h1>{task.title}</h1>
  )
};

const taskLoader = async ({params}) => {
  const result = await fetch(`/api/tasks/${params.id}`);
  const data = await result.json();
  return data;
}


export {TaskPage as default, taskLoader};