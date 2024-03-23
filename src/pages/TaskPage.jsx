import React from 'react'
import {useState, useEffect} from 'react';
import todo from '../todo.json';
import {useLoaderData, useParams} from 'react-router-dom';
import { Link } from 'react-router-dom';
import {FaArrowLeft} from 'react-icons/fa';

const TaskPage = () => {
  const {id} = useParams();
  const task = useLoaderData();
  return (
    // making a "go back" feature
    <section>
      <div className="container m-auto py-6 px-6">
        <Link to='/tasks' className='text-green-500 hover:text-green-600 flex items-center'>
          <FaArrowLeft className='mr-2' />
          Go Back
        </Link>
      </div>
    </section>

    
  )
};

const taskLoader = async ({params}) => {
  const result = await fetch(`/api/tasks/${params.id}`);
  const data = await result.json();
  return data;
}


export {TaskPage as default, taskLoader};