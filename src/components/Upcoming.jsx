import React, { useSyncExternalStore } from 'react'
import todo from '../todo.json';
import Item from './Item';
import {useState, useEffect} from 'react';

const Upcoming = ({title = "Upcoming tasks", isHome = false}) => {
    
    const [tasks, setTasks] = useState([]);

    useEffect( () => {
        const fetchTasks = async () => {
            try {
                const result = await fetch('http://localhost:2000/tasks');
                const data = await result.json();
                setTasks(data);
            } catch (error){
                console.log("Error ", error);
            }
        }
        fetchTasks();
    }, [])

  return (
    <>
        <section className='bg-green-40 px-4 py-10'>
            <div className="container-xl lg:container m-auto">
                <h2 className="text-3xl font-bold text-green-500 mb-6 text-center">
                    {title}
                </h2>
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {tasks.map((item) => (
                        <Item item={item} key = {item.id}/>
                    ))}
                    
                </div>
            </div>
        </section>
    </>
  )
}

export default Upcoming;