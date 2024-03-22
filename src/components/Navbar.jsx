import React from 'react';
import logo from '../assets/images/logo.jpg';
import {NavLink} from 'react-router-dom';

const Navbar = () => {
  return (
    <nav className="bg-green-700 border-b border-green-500">
        <div className="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div className="flex h-20 items-center justift-between">
                <div className="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                    <a className="flex flex-shrink-0 items-center mr-4"
                    to=''>
                        <img className='h-10 w-auto' src={logo} alt='ToDo List' />
                        <span className="hidden md:block text-white text-2xl font-bold ml-2">
                            ToDo List
                        </span>
                    </a>

                    <div className="md:ml-auto">
                        <div className="flex space-x-2">

                            <a to='/'
                            className="text-white bg-black hover:bg-gray-900 hover:text-white rounded-md px-3 py-2">
                                Home
                            </a>

                            <a to='/chores/'
                            className='text-white hover:bg-gray-900 hover:text-white rounded-md px-3 py-2'>
                                Chores
                            </a>

                            <a to='/add-chore' className='text-white hover:bg-gray-900 hover:text-white rounded-md px-3 py-2'>Add item</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  )
}

export default Navbar