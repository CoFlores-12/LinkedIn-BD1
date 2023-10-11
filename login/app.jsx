import React from 'react'
import Login from './login'
import Signin from './signin'

function App() {
    const [view, setView] = React.useState('login')
    return view==='login' ? <Login setView={setView} /> : <Signin setView={setView} />
}

export default App