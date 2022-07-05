import React, { useState } from "react";
import ReactDOM from "react-dom";
import Style from "../values/Style";
import Card from "../components/Card";
import RadioButton from "../components/RadioButton";

const style = {
    radioContainer: {
        marginTop: 40
    }
}

const DataDiriScreen = (props) => {
    const [isGroup, setIsGroup] = useState(false)
    const [data, setData] = useState({})

    return (
        <div style={Style.container}>
            <Card
                title='Data Diri'
            >
                <div style={style.radioContainer}>
                    <RadioButton
                        id='pribadi'
                        title='Pribadi'
                        value={isGroup}
                        isDefault={true}
                        onClick={() => {
                            setIsGroup(false)
                        }}
                    />
                    <RadioButton
                        id='grup'
                        title='Grup'
                        value={isGroup}
                        isDefault={false}
                        onClick={() => {
                            setIsGroup(true)
                        }}
                    />
                </div>
            </Card>
        </div>
    )
}

export default DataDiriScreen

if (document.getElementById('data-diri')) {
    ReactDOM.render(<DataDiriScreen />, document.getElementById('data-diri'));
}