import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import ToolBar from './components/toolbar.jsx'
import NavBar from './components/navbar/navbar'
import Publicaciones from './components/publicaciones/publicaciones'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <ToolBar />
    <Publicaciones />
    <NavBar />
  </React.StrictMode>,
)
