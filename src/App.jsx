import React from 'react'
import Navbar from './components/Navbar'
import {Route, createBrowserRouter, createRoutesFromElements, RouterProvider} from 'react-router-dom';

const App = () => {
  return (
    <>
      <Navbar />
      <span>test</span>
    </>
  )
}

export default App