import React from 'react'
import {Route, createBrowserRouter, createRoutesFromElements, RouterProvider} from 'react-router-dom';
import HomePage from './pages/HomePage';
import MainLayout from './layouts/MainLayout';
import TasksPage from './pages/TasksPage';
import NotFoundPage from './pages/NotFoundPage';
import TaskPage, { taskLoader } from './pages/TaskPage';
import AddTaskPage from './pages/AddTaskPage';


const router = createBrowserRouter(
  createRoutesFromElements(
    <Route path='/' element={<MainLayout />}>
      <Route index element ={<HomePage />} />
      <Route path='/tasks' element={<TasksPage />} />
      <Route path='/tasks/:id' element={<TaskPage />} loader={taskLoader}/>
      <Route path='/add-task' element={<AddTaskPage />} />
      <Route path='*' element={<NotFoundPage />} />
    </Route>
  )
);

const App = () => {
  return (
    <RouterProvider router={router} />
  );
}

export default App