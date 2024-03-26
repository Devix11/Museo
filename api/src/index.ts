import Fastify from 'fastify'
import fastifyStatic from '@fastify/static'
import fastifyMysql, { MySQLPromisePool } from '@fastify/mysql'
import path from 'path'
import fs, { mkdirSync } from 'fs'
import { fileURLToPath } from 'url'

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)
const __rootpath = path.join(__dirname, '..', '..')

////////// FOLDERS SETUP ///////////
const IMAGES_PATH = path.join(__rootpath, 'images')
if (!fs.existsSync(IMAGES_PATH)) mkdirSync(IMAGES_PATH)
const EXHIBITIONS_PATH = path.join(IMAGES_PATH, 'exhibitions')
if (!fs.existsSync(EXHIBITIONS_PATH)) mkdirSync(EXHIBITIONS_PATH)
////////// FOLDERS SETUP ///////////

declare module 'fastify' {
    interface FastifyInstance {
      mysql: MySQLPromisePool
    }
}

const server = Fastify({
    logger: true
})


//////// PLUGINS ////////
server.register(fastifyStatic, {
    root: path.join(__dirname, 'resources'),
})

server.register(fastifyMysql, {
    promise: true,
    connectionString: 'mysql://phpmyadmin@localhost/Museo'
})
//////// PLUGINS ////////


///////// DEBUG /////////
server.get('/ping', async (request, reply) => {
    return 'pong\n'
})

server.get('/test', async (request, reply) => {
    reply
    .code(200)
    .header('Content-Type', 'application/json; charset=utf-8')
    .send({ hello: 'world' })
})
//////// DEBUG /////////

server.get('/exhibitions', async (request, reply) => {
    try {
        const conn = await server.mysql.getConnection()
        const [row, fields] = await conn.query('SELECT Name, Image FROM Exhibitions')
        conn.release()

        return { row, fields }
        // const files = fs.promises.readdir(EXHIBITIONS_PATH)
        // reply.send(files)
    } catch (error) {
        reply.code(500).send(error)
    }
})

// IN PRODUCTION CHANGE TO 127.0.0.1
const start = async () => {
    try {
        const address = await server.listen({ host: '0.0.0.0', port: 3338 })
        server.log.info(`Server listening on ${address}`)
    } catch (err) {
        server.log.error(err)
        process.exit(1)
    }
}
start()