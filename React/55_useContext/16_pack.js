const shareObj = React.createContext()
export default function Home() {
    const [food, setFood] = React.useState('薑母鴨')
    const func = () => { setFood('雞鴨鵝') }
    return <React.Fragment>
        <p>Home</p>
        <shareObj.Provider value={{ food, func }}>
            <Member />
        </shareObj.Provider>
    </React.Fragment>
}
function Member() {
    return <div>
        <p>Member</p>
        <Order />
    </div>
}
function Order() {
    return <div>
        <p>Order</p>
        <OrderDetail />
    </div>
}
function OrderDetail() {
    let { food, func } = React.useContext(shareObj)
    return <div>
        <p>OrderDetail - {food}</p>
        <button onClick={() => { func() }}>換食物</button>
    </div>
}
// export default{
//     shareObj,
//     Home, 
//     Member,
//     Order,
//     OrderDetail
// }
