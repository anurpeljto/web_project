import React from 'react'
import {useState, useEffect} from 'react';
import todo from '../todo.json';
import {useLoaderData, useParams} from 'react-router-dom';
import { Link } from 'react-router-dom';
import {FaArrowLeft} from 'react-icons/fa';
import {FaCheck} from 'react-icons/fa';
import {FaTimes} from 'react-icons/fa';


const TaskPage = () => {
  const {id} = useParams();
  const task = useLoaderData();
  return (
    // making a "go back" feature
    <>
      <section>
        <div className="container m-auto py-6 px-6">
          <Link to='/tasks' className='text-green-500 hover:text-green-600 flex items-center'>
            <FaArrowLeft className='mr-2' />
            Go Back
          </Link>
        </div>
      </section>

      <section className="bg-white h-svh w-full">
        <div className="container m-auto py-10 px-6">
          <div className="grid grid-cols-2 md:grid-cols-70/30 w-full gap-6">
            <main>
              <div className="text-green-600 mb-4 text-3xl font-bold">{task.title}</div>
              <div className="text-amber-500 mb-4">{task.duration}</div>

              <div className="bg-white p-6 rounded-lg shadow-xl mt-6">
                <h3 className="text-amber-500 text-lg font-bold mb-6">
                  Task description
                </h3>

                <p className="mb-4 text-green-500">{task.description}</p>
              </div>
            </main>

            <div className="grid grid-cols-2 grid-rows-2 rounded-lg bg-white mt-6">
              <h3 className="text-2xl font-bold mb-6 col-span-2 flex justify-center text-amber-500 pt-4">Manage task</h3>
              <div className="rounded-lg flex justify-center items-center shadow-md mb-4 ml-3 bg-green-100 hover:bg-green-300">
                <span className='text-xl text-black'>Mark done <FaCheck className='inline'/>
                </span>
              </div>
              <div className="rounded-lg flex justify-center items-center shadow-lg mb-4 ml-3 bg-red-100 hover:bg-red-300 mr-4">
                <span className='text-xl text-black'> Remove task <FaTimes className='inline'/>
                </span>
              </div>
            </div>
          </div>
        </div>

      </section>
    </>
  )
};

const taskLoader = async ({params}) => {
  const result = await fetch(`/api/tasks/${params.id}`);
  const data = await result.json();
  return data;
}


export {TaskPage as default, taskLoader};