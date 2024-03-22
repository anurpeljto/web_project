import React from 'react'
import Navbar from './components/Navbar'
import {Route, createBrowserRouter, createRoutesFromElements, RouterProvider} from 'react-router-dom';
import Upcoming from './components/Upcoming';

const App = () => {
  return (
    <>
      <Navbar />
      <Upcoming />
    </>
  )
}

export default App